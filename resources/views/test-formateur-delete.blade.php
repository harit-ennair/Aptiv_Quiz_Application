<!DOCTYPE html>
<html>
<head>
    <title>Test Formateur Delete</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Test Formateur Delete Function</h1>
    <p>Open console and run:</p>
    <code>
        <pre>
// Test the API endpoint
fetch('/admin/api/formateurs')
.then(response => response.json())
.then(data => console.log('API Response:', data));

// Test delete function
fetch('/admin/api/formateurs/1', {
    method: 'DELETE',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
})
.then(response => response.json())
.then(data => console.log('Delete Response:', data));
        </pre>
    </code>
</body>
</html>
