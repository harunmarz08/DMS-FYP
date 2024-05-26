<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Multiple Submit Buttons</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <form id="multi-action-form" method="POST">
            @csrf
            <!-- Your form fields here -->
            <div class="mb-4">
                <label for="exampleInput" class="block text-sm font-medium text-gray-700">Example Input</label>
                <input type="text" name="exampleInput" id="exampleInput" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
            </div>

            <!-- Submit Buttons -->
            <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg p-4 flex justify-end">
                <button type="button" onclick="submitForm('{{ route('route1') }}')" class="mx-1 bg-blue-500 text-white px-4 py-2 rounded">Submit to Route 1</button>
                <button type="button" onclick="submitForm('{{ route('route2') }}')" class="mx-1 bg-green-500 text-white px-4 py-2 rounded">Submit to Route 2</button>
                <button type="button" onclick="submitForm('{{ route('route3') }}')" class="mx-1 bg-red-500 text-white px-4 py-2 rounded">Submit to Route 3</button>
            </div>
        </form>
    </div>

    <script>
        function submitForm(action) {
            const form = document.getElementById('multi-action-form');
            form.action = action;
            form.submit();
        }
    </script>

</body>
</html>
