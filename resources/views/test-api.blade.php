<!DOCTYPE html>
<html>
<head>
    <title>Test API Fetch</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Test API Response</h1>
    <div id="result"></div>
    <button onclick="testAPI()">Test API</button>

    <script>
        async function testAPI() {
            try {
                console.log('Fetching data from API...');
                const response = await fetch('/admin/api/tests');
                const data = await response.json();
                
                console.log('API Response:', data);
                
                const resultDiv = document.getElementById('result');
                
                if (data.success) {
                    resultDiv.innerHTML = `
                        <h2>✅ API Success!</h2>
                        <p><strong>Total tests:</strong> ${data.data.length}</p>
                        <h3>Sample Test Data:</h3>
                        <pre>${JSON.stringify(data.data[0], null, 2)}</pre>
                    `;
                    
                    // Test the process names
                    data.data.forEach((test, index) => {
                        console.log(`Test ${index + 1}:`, {
                            id: test.id,
                            user: test.user?.name + ' ' + test.user?.last_name,
                            category_name: test.category_name,
                            process_name: test.process_name,
                            formateur: test.formateur?.name + ' ' + test.formateur?.last_name,
                            score: test.pourcentage
                        });
                    });
                } else {
                    resultDiv.innerHTML = `
                        <h2>❌ API Error</h2>
                        <p>${data.message}</p>
                    `;
                }
            } catch (error) {
                console.error('Error:', error);
                document.getElementById('result').innerHTML = `
                    <h2>❌ Network Error</h2>
                    <p>${error.message}</p>
                `;
            }
        }
        
        // Auto-test on page load
        window.onload = testAPI;
    </script>
</body>
</html>
