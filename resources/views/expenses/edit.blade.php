<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Expense') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('expenses.update', $expense) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Expense Title</label>
                        <input type="text" name="title" class="w-full border p-2 rounded" value="{{ $expense->title }}" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Amount ($)</label>
                        <input type="number" step="0.01" name="amount" class="w-full border p-2 rounded" value="{{ $expense->amount }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Category</label>
                        <select name="category" class="w-full border p-2 rounded">
                            <option value="Food" {{ $expense->category == 'Food' ? 'selected' : '' }}>Food & Dining</option>
                            <option value="Travel" {{ $expense->category == 'Travel' ? 'selected' : '' }}>Travel</option>
                            <option value="Shopping" {{ $expense->category == 'Shopping' ? 'selected' : '' }}>Shopping</option>
                            <option value="Bills" {{ $expense->category == 'Bills' ? 'selected' : '' }}>Bills & Utilities</option>
                            <option value="Entertainment" {{ $expense->category == 'Entertainment' ? 'selected' : '' }}>Entertainment</option>
                            <option value="Other" {{ $expense->category == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Date</label>
                        <input type="date" name="date" class="w-full border p-2 rounded" value="{{ $expense->date }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Description (Optional)</label>
                        <textarea name="description" class="w-full border p-2 rounded">{{ $expense->description }}</textarea>
                    </div>

                    <button type="submit" style="background-color: #3b82f6; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer; font-weight: bold;">
                        Update Expense
                    </button>
                    <a href="{{ route('expenses.index') }}" style="color: #6b7280; margin-left: 15px; text-decoration: none;">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>