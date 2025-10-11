<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bulk Image Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .upload-box {
            border: 2px dashed #ccc;
            padding: 40px;
            text-align: center;
            margin: 20px 0;
            border-radius: 8px;
            background: #fafafa;
        }
        input[type="file"] {
            margin: 20px 0;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #45a049;
        }
        button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        .results {
            margin-top: 20px;
            padding: 15px;
            background: #e8f5e9;
            border-radius: 4px;
            display: none;
        }
        .error {
            background: #ffebee;
            color: #c62828;
        }
        .progress {
            margin-top: 20px;
        }
        .warning {
            background: #fff3cd;
            border: 1px solid #ffc107;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📸 Bulk Image Upload</h1>
        
        <div class="warning">
            <strong>⚠️ SECURITY WARNING:</strong> This page is TEMPORARY. Delete this route after uploading images!
        </div>

        <div class="upload-box">
            <h3>Method 1: Upload Multiple Images</h3>
            <p>Select multiple image files (hold Ctrl/Cmd to select multiple)</p>
            <input type="file" id="images" multiple accept="image/*">
            <br>
            <button onclick="uploadImages()">Upload Images</button>
        </div>

        <div class="upload-box">
            <h3>Method 2: Upload ZIP File</h3>
            <p>Upload a ZIP file containing all your images</p>
            <input type="file" id="zipFile" accept=".zip">
            <br>
            <button onclick="uploadZip()">Upload & Extract ZIP</button>
        </div>

        <div id="progress" class="progress" style="display: none;">
            <p>Uploading... Please wait.</p>
        </div>

        <div id="results" class="results"></div>
    </div>

    <script>
        async function uploadImages() {
            const input = document.getElementById('images');
            const files = input.files;
            
            if (files.length === 0) {
                alert('Please select files first');
                return;
            }

            const formData = new FormData();
            for (let i = 0; i < files.length; i++) {
                formData.append('images[]', files[i]);
            }

            document.getElementById('progress').style.display = 'block';
            document.getElementById('results').style.display = 'none';

            try {
                const response = await fetch('/bulk-upload-images', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });

                const result = await response.json();
                
                document.getElementById('progress').style.display = 'none';
                const resultsDiv = document.getElementById('results');
                resultsDiv.style.display = 'block';
                resultsDiv.className = 'results';
                
                resultsDiv.innerHTML = `
                    <h3>✅ Upload Complete!</h3>
                    <p><strong>Successfully uploaded:</strong> ${result.uploaded} files</p>
                    <p><strong>Errors:</strong> ${result.errors} files</p>
                    ${result.files.length > 0 ? '<h4>Uploaded files:</h4><ul>' + result.files.map(f => '<li>' + f + '</li>').join('') + '</ul>' : ''}
                    ${result.error_details.length > 0 ? '<h4>Errors:</h4><ul>' + result.error_details.map(e => '<li>' + e + '</li>').join('') + '</ul>' : ''}
                `;
                
                input.value = '';
            } catch (error) {
                document.getElementById('progress').style.display = 'none';
                document.getElementById('results').style.display = 'block';
                document.getElementById('results').className = 'results error';
                document.getElementById('results').innerHTML = `<h3>❌ Error</h3><p>${error.message}</p>`;
            }
        }

        async function uploadZip() {
            const input = document.getElementById('zipFile');
            const file = input.files[0];
            
            if (!file) {
                alert('Please select a ZIP file first');
                return;
            }

            const formData = new FormData();
            formData.append('zip_file', file);

            document.getElementById('progress').style.display = 'block';
            document.getElementById('results').style.display = 'none';

            try {
                const response = await fetch('/bulk-upload-zip', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });

                const result = await response.json();
                
                document.getElementById('progress').style.display = 'none';
                const resultsDiv = document.getElementById('results');
                resultsDiv.style.display = 'block';
                resultsDiv.className = 'results';
                
                resultsDiv.innerHTML = `
                    <h3>✅ ZIP Extracted Successfully!</h3>
                    <p><strong>Location:</strong> ${result.location}</p>
                    <p>Files have been extracted to storage/app/public/extracted/</p>
                `;
                
                input.value = '';
            } catch (error) {
                document.getElementById('progress').style.display = 'none';
                document.getElementById('results').style.display = 'block';
                document.getElementById('results').className = 'results error';
                document.getElementById('results').innerHTML = `<h3>❌ Error</h3><p>${error.message}</p>`;
            }
        }
    </script>
</body>
</html>

