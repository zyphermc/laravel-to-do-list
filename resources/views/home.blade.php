<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-gray-800">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My To-Do List</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css"
        integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="text-white">
    <div class="w-1/2 mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">To-Do List</h1>
        <form method="post" action="{{ route('saveItem') }}" class="flex mb-4">
            {{ csrf_field() }}
            <input
                class="flex-1 rounded-l-lg py-2 px-4 border-t mr-0 border-b border-l text-white bg-gray-700 dark:bg-gray-900 dark:text-white dark:border-gray-600 placeholder-gray-500 placeholder-opacity-75"
                type="text" name="name" placeholder="Add a new item...">
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-500 rounded-r-lg text-white px-4 py-2">Add</button>
        </form>
        <ul class="border-t border-l border-r border-b divide-y divide-gray-600">
            @foreach ($listItems as $listItem)
                <li class="py-4 px-2">
                    <div class="flex items-center">
                        <span class="flex-1">{{ $listItem->name }}</span>
                        <div class="flex">
                            <form method="post" action="{{ route('markComplete', $listItem->id) }}" class="mr-2">
                                {{ csrf_field() }}
                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-md text-white">
                                    Complete
                                </button>
                            </form>
                            <form method="get" action="{{ route('editItem', $listItem->id) }}">
                                <button type="submit"
                                    class="bg-yellow-500 hover:bg-yellow-400 px-4 py-2 rounded-md mr-2 text-white">
                                    Edit
                                </button>
                            </form>
                            <form method="post" action="{{ route('deleteItem', $listItem->id) }}">
                                {{ csrf_field() }}
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded-md text-white">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
    integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if (Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}")
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}");
        </script>
    @endforeach
@endif

</html>
