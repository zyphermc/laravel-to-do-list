<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" class="bg-gray-800">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Item</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css"
        integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="text-white">
    <div class="w-1/2 mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Edit Item</h1>
        <form method="post" action="{{ route("updateItem", $listItem->id) }}" class="flex flex-col mb-4">
            {{ csrf_field() }}
            <label for="name" class="mb-2">Description</label>
            <input type="text" name="name" value="{{ $listItem->name }}"
                class="rounded-lg py-2 px-4 border text-white bg-gray-700 dark:bg-gray-900 dark:text-white dark:border-gray-600 placeholder-gray-500 placeholder-opacity-75 mb-4">
            <div class="flex">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-500 rounded-md text-white px-4 py-2 mr-2">Submit</button>
                <a href="/" class="bg-gray-600 hover:bg-gray-500 rounded-md text-white px-4 py-2">Cancel</a>
            </div>
        </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
    integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}");
        </script>
    @endforeach
@endif

</html>
