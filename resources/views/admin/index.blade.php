<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Go to Home</p>
                    <a class="mt-4 p-4 rounded-lg" href="{{ url('/') }}">Home</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Go to Products</p>
                    <a class="mt-4 p-4 rounded-lg" href="{{ url('/product') }}">Products</a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
