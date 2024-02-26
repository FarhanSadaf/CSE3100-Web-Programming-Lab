@extends('layouts.master')
@section('content')
    @include('components.expense-list')
@endsection

<script>
    let userId = 1; // Hardcoded user id for now

    // Fetch expenses when the page loads
    fetchExpenses(userId);

    function fetchExpenses(userId) {
        fetch(`/api/expenses/user/${userId}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                addExpensesToTable(data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    // Function to set rows to the expense table
    function addExpensesToTable(expenses) {
        const expenseTableBody = document.getElementById('expense-table-body');
        
        // Clear the table body first
        expenseTableBody.innerHTML = '';

        // Set the rows to the table
        expenses.forEach(expense => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${expense.id}</td>
                <td>${expense.amount}</td>
                <td>${expense.description}</td>
                <td>${expense.expense_date}</td>
                <td>${expense.location}</td>
                <td>${expense.payment_method}</td>
                <td>${expense.category_name}</td>
                <td>
                    <button class="btn btn-primary">Update</button>
                    <button class="btn btn-danger" onClick="deleteExpense(${expense.id})"">Delete</button>
                </td>
            `;
            expenseTableBody.appendChild(row);
        });
    }

    // Function to delete an expense
    function deleteExpense(expenseId) {
        // Show a confirmation dialog
        if (!confirm('Are you sure you want to delete this expense?')) {
            return;
        }

        fetch(`/api/expenses/delete/${expenseId}`, {
            method: 'DELETE',
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            // Fetch expenses again to update the table
            fetchExpenses(userId);    // Hardcoded user id for now
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
</script>