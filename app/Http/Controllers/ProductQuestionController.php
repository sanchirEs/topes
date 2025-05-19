<?php
// app/Http/Controllers/ProductQuestionController.php
namespace App\Http\Controllers;

use App\Models\ProductQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\Product;


class ProductQuestionController extends Controller
{

    public function index($productId)
    {
        $questions = ProductQuestion::where('product_id', $productId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('product.show', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'asker_name' => 'nullable|string|max:255',
            'question_text' => 'required|string',
        ]);

        $askerName = $request->input('asker_name') ?: 'Зочин';

        // ← Assign the created model to $question
        $question = ProductQuestion::create([
            'product_id' => $request->input('product_id'),
            'asker_name' => $askerName,
            'question_text' => $request->input('question_text'),
        ]);

        // ← Send the Telegram notification
        $token = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        $product = Product::find($question->product_id);
        $productName = $product ? $product->name : "Product #{$question->product_id}";

        $message = "🆕 *Шинэ асуулт* : *{$productName}*\n"
            . "_From_: {$question->asker_name}\n"
            . "_Q_: {$question->question_text}";

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'Markdown',
        ]);

        return redirect()->back()->with('success', 'Question submitted successfully!');
    }


    public function reply(Request $request, $id)
    {
        $request->validate([
            'answer_text' => 'required|string',
            'answered_by' => 'nullable|string|max:255',
        ]);

        // Find the question by ID
        $question = ProductQuestion::findOrFail($id);

        // Update the question with the reply
        $question->update([
            'answer_text' => $request->input('answer_text'),
            'answered_by' => $request->input('answered_by') ?: 'Админ',
            'answered_at' => now(),
            'status' => 1,  // Mark as answered
        ]);

        return redirect()->back()->with('success', 'Reply submitted successfully!');
    }

    public function updateReply(Request $request, $id)
    {
        $request->validate([
            'answer_text' => 'required|string',
            'answered_by' => 'nullable|string|max:255',
        ]);

        // Find the question by ID
        $question = ProductQuestion::findOrFail($id);

        // Update the reply fields
        $question->update([
            'answer_text' => $request->input('answer_text'),
            'answered_by' => $request->input('answered_by') ?: 'Админ',
            'answered_at' => now(),
            'status' => 1,  // Mark as answered
        ]);

        return redirect()->back()->with('success', 'Reply updated successfully!');
    }

    public function destroyReply(Request $request, $id)
    {
        $request->validate([
            'answer_text' => 'required|string',
            'answered_by' => 'nullable|string|max:255',
        ]);

        // Find the question by ID
        $question = ProductQuestion::findOrFail($id);

        // Update the reply fields
        $question->update([
            'answer_text' => '',
            'answered_by' => $request->input('answered_by') ?: 'Админ',
            'answered_at' => now(),
            'status' => 1,  // Mark as answered
        ]);

        return redirect()->back()->with('success', 'Reply updated successfully!');
    }

    public function destroy($id)
    {
        // Find the question by ID
        $question = ProductQuestion::findOrFail($id);

        // Delete the question (and the reply, as it's in the same record)
        $question->delete();

        return redirect()->back()->with('success', 'Question (and reply, if any) deleted successfully!');
    }
}
