<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Testimonials') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">Testimonials</h3>
                        <a href="{{ route('testimonials.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow">
                            Add New Testimonial
                        </a>
                    </div>

                    <table class="w-full table-auto border-collapse rounded-lg overflow-hidden shadow-md">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">#</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Testimonial Text</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Client Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Client Position</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Client Company</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Client Profile Picture</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testimonials as $testimonial)
                            <tr class="even:bg-gray-50 hover:bg-gray-100 transition">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 truncate">{{ Str::limit($testimonial->testimonial_text, 50, '...') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $testimonial->client_name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $testimonial->client_position }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $testimonial->client_company }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    <img src="{{ $testimonial->client_profile_picture }}" alt="Client Profile Picture" class="h-10 w-10 rounded-full object-cover">
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-medium py-2 px-3 rounded shadow">
                                            Edit
                                        </a>
                                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-3 rounded shadow">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-600">
                                    No testimonials available.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>