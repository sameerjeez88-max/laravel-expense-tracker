<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Expense') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('expenses.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Expense Title</label>
                        <input type="text" name="title" class="w-full border p-2 rounded" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Amount ($)</label>
                        <input type="number" step="0.01" name="amount" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Category</label>
                        <select name="category" class="w-full border p-2 rounded">
                            <option value="Food">Food & Dining</option>
                            <option value="Travel">Travel</option>
                            <option value="Shopping">Shopping</option>
                            <option value="Bills">Bills & Utilities</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Date</label>
                        <input type="date" name="date" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Description (Optional)</label>
                        <textarea name="description" class="w-full border p-2 rounded"></textarea>
                    </div>

                    <button type="submit" style="background-color: #22c55e; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer; font-weight: bold;">
                        Save Expense
                    </button>
                    <a href="{{ route('expenses.index') }}" style="color: #6b7280; margin-left: 15px; text-decoration: none;">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>