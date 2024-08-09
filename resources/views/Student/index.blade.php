<x-layout> 
    <x-slot:heading>
        Dashboard
    </x-slot:heading>

    <div class="overflow-x-hidden">
        <div class="flex justify-end mb-4">
            <button onclick="openAddModal()" class="px-4 py-2 bg-green-600 text-white rounded-md">Add New Student</button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 border border-gray-300">
                <thead class="bg-gray-50 border-b border-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-300">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-300">
                            Subject
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-300">
                            Marks
                        </th>
                        <th scope="col" colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center border-b border-gray-300">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($students as $student)
                    <tr class="border-b border-gray-300">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r border-gray-300">
                            {{ $student->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 border-r border-gray-300">
                            {{ $student->subject }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 border-r border-gray-300">
                            {{ $student->mark }}
                        </td>
                        <td colspan="2" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center border-r border-gray-300">
                            <button onclick="openEditModal({{ $student->id }}, '{{ $student->name }}', '{{ $student->subject }}', {{ $student->mark }})" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                            <button onclick="confirmDelete({{ $student->id }})" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            No students found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div id="edit-modal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md mx-4">
            <h2 class="text-lg font-semibold mb-4">Edit Student</h2>
            <form id="edit-student-form">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" id="student-id" name="id">
                <div class="mb-4">
                    <x-form-label for="name">Name</x-form-label>
                    <x-form-input id="name" name="name" type="text" autocomplete="true" required />
                    <x-form-error name="name" />
                </div>
                <div class="mb-4">
                    <x-form-label for="subject">Subject</x-form-label>
                    <x-form-input id="subject" name="subject" type="text" autocomplete="true" required />
                    <x-form-error name="subject" />
                </div>
                <div class="mb-4">
                    <x-form-label for="mark">Mark</x-form-label>
                    <x-form-input id="mark" name="mark" type="number" autocomplete="true" required />
                    <x-form-error name="mark" />
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-500 text-white rounded-md">Cancel</button>
                    <button type="submit" class="ml-4 px-4 py-2 bg-indigo-600 text-white rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div id="add-modal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md mx-4">
            <h2 class="text-lg font-semibold mb-4">Add New Student</h2>
            <form id="add-student-form">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="mb-4">
                    <x-form-label for="add-name">Name</x-form-label>
                    <x-form-input id="add-name" name="add-name" type="text" autocomplete="true" required />
                    <x-form-error name="add-name" />
                </div>
                <div class="mb-4">
                    <x-form-label for="add-subject">Subject</x-form-label>
                    <x-form-input id="add-subject" name="add-subject" type="text" autocomplete="true" required />
                    <x-form-error name="add-subject" />
                </div>
                <div class="mb-4">  
                    <x-form-label for="add-mark">Mark</x-form-label>
                    <x-form-input id="add-mark" name="add-mark" type="number" autocomplete="true" required />
                    <x-form-error name="add-mark" />
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeAddModal()" class="px-4 py-2 bg-gray-500 text-white rounded-md">Cancel</button>
                    <button type="submit" class="ml-4 px-4 py-2 bg-green-600 text-white rounded-md">Add</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, name, subject, mark) {
            document.getElementById('student-id').value = id;
            document.getElementById('name').value = name;
            document.getElementById('subject').value = subject;
            document.getElementById('mark').value = mark;
            document.getElementById('edit-modal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('edit-modal').classList.add('hidden');
        }

        document.getElementById('edit-student-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const id = document.getElementById('student-id').value;
            const name = document.getElementById('name').value;
            const subject = document.getElementById('subject').value;
            const mark = document.getElementById('mark').value;

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/students/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    name: name,
                    subject: subject,
                    mark: mark
                })
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(error => { throw new Error(error.message) });
                }
                return response.json();
            })
            .then(data => {
                alert(data.message); // Show message response in alert
                closeEditModal();
                location.reload(); // Reload the page to see the updated student
            })
            .catch(error => {
                alert('Error: ' + error.message);
            });
        });

        function openAddModal() {
            document.getElementById('add-modal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('add-modal').classList.add('hidden');
        }

        document.getElementById('add-student-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const name = document.getElementById('add-name').value;
            const subject = document.getElementById('add-subject').value;
            const mark = document.getElementById('add-mark').value;

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/students`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    name: name,
                    subject: subject,
                    mark: mark
                })
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(error => { throw new Error(error.message) });
                }
                return response.json();
            })
            .then(data => {
                alert(data.message);
                closeAddModal();
                location.reload(); // Reload to see updated details
            })
            .catch(error => {
                alert('Error: ' + error.message);
            });
        });

        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this student?')) {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch(`/students/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(error => { throw new Error(error.message) });
                    }
                    return response.json();
                })
                .then(data => {
                    alert('Student deleted successfully');
                    location.reload(); // Optionally reload the page or update the DOM
                })
                .catch(error => {
                    alert('Error: ' + error.message);
                });
            }
        }
    </script>
</x-layout>
