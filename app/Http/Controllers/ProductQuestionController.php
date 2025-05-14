<?php
// app/Http/Controllers/ProductQuestionController.php
namespace App\Http\Controllers;

use App\Models\ProductQuestion;
use Illuminate\Http\Request;

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
        

        // Set the asker_name to "Зочин" if null or empty
        $askerName = $request->input('asker_name') ?: 'Зочин';
        
        // Create the product question
        // ProductQuestion::create($request->all());
        ProductQuestion::create([
            'product_id' => $request->input('product_id'),
            'asker_name' => $askerName,
            'question_text' => $request->input('question_text'),
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

    public function destroy($id)
    {
        // Find the question by ID
        $question = ProductQuestion::findOrFail($id);

        // Delete the question (and the reply, as it's in the same record)
        $question->delete();

        return redirect()->back()->with('success', 'Question (and reply, if any) deleted successfully!');
    }
}
