@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4" x-data="{ showModal: false, modalType: '', employee: {} }">
    <h1 class="text-2xl font-bold mb-4">Employees</h1>
    <button @click="showModal = true; modalType = 'create'; employee = {}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Add Employee</button>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Employee Code</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $employee->emp_code }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->emp_name }}</td>
                    <td class="py-2 px-4 border-b">
                        <div class="relative inline-block text-left" x-data="{ open: false }">
                            <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
                                ...
                            </button>
                            <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div class="py-1">
                                    <button @click="showModal = true; modalType = 'view'; employee = {{ json_encode(['id' => $employee->emp_id, 'emp_code' => $employee->emp_code, 'emp_name' => $employee->emp_name]) }}; open = false" class="text-gray-700 block px-4 py-2 text-sm">View</button>
                                    <button @click="showModal = true; modalType = 'edit'; employee = {{ json_encode(['id' => $employee->emp_id, 'emp_code' => $employee->emp_code, 'emp_name' => $employee->emp_name]) }}; open = false" class="text-gray-700 block px-4 py-2 text-sm">Edit</button>
                                    <button @click="showModal = true; modalType = 'delete'; employee = {{ json_encode(['id' => $employee->emp_id, 'emp_code' => $employee->emp_code, 'emp_name' => $employee->emp_name]) }}; open = false" class="text-gray-700 block px-4 py-2 text-sm">Delete</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Component -->
    <x-modal>
        <x-slot name="title">
            <span x-text="modalType.charAt(0).toUpperCase() + modalType.slice(1) + ' Employee'"></span>
        </x-slot>
        <template x-if="modalType === 'view'">
            <div>
                <p><strong>Employee Code:</strong> <span x-text="employee.emp_code"></span></p>
                <p><strong>Name:</strong> <span x-text="employee.emp_name"></span></p>
            </div>
        </template>
        <template x-if="modalType === 'create' || modalType === 'edit'">
            <form :action="modalType === 'create' ? '{{ route('employees.store') }}' : '{{ url('employees') }}/' + employee.id" method="POST">
                @csrf
                <template x-if="modalType === 'edit'">
                    @method('PUT')
                </template>
                <div class="mb-4">
                    <label for="emp_name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <input type="text" id="emp_name" name="emp_name" x-model="employee.emp_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Save
                    </button>
                    <button type="button" @click="showModal = false" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </button>
                </div>
            </form>
        </template>
        <template x-if="modalType === 'delete'">
            <form :action="'{{ url('employees') }}/' + employee.id" method="POST">
                @csrf
                @method('DELETE')
                <p>Are you sure you want to delete this employee?</p>
                <div class="flex items-center justify-between mt-4">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Delete
                    </button>
                    <button type="button" @click="showModal = false" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </button>
                </div>
            </form>
        </template>
    </x-modal>
</div>
@endsection