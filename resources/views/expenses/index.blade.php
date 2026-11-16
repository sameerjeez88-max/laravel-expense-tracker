<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Expenses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-green-600">Total Expenses: ${{ number_format($total, 2) }}</h3>
                    <a href="{{ route('expenses.create') }}" style="background-color: #3b82f6; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                        + Add New Expense
                    </a>
                </div>

                @if(session('success'))
                    <div style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-3 border">Title</th>
                            <th class="p-3 border">Category</th>
                            <th class="p-3 border">Amount</th>
                            <th class="p-3 border">Date</th>
                            <th class="p-3 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($expenses as $expense)
                        <tr>
                            <td class="p-3 border">{{ $expense->title }}</td>
                            <td class="p-3 border">
                                <span style="background-color: #e5e7eb; padding: 5px 10px; border-radius: 15px; font-size: 12px;">{{ $expense->category }}</span>
                            </td>
                            <td class="p-3 border text-red-500 font-bold">${{ number_format($expense->amount, 2) }}</td>
                            <td class="p-3 border">{{ $expense->date }}</td>
                            <td class="p-3 border">
                                <!-- Edit Link -->
                                <a href="{{ route('expenses.edit', $expense) }}" style="color: #3b82f6; margin-right: 10px; text-decoration: none; font-weight: bold;">Edit</a>
                                
                                <!-- Delete Button -->
                                <form action="{{ route('expenses.destroy', $expense) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" style="color: #ef4444; background: none; border: none; cursor: pointer; text-decoration: underline;" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-3 border text-center">No expenses found. Add a new expense!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>