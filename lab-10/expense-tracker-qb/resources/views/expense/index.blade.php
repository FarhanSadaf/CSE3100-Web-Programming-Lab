@extends('layouts.master')
@section('content')
@include('components.expense-list')

<script>
    // userId from url GET request parameter
    let urlParams = new URLSearchParams(window.location.search);
    
    if (!urlParams.has('userId')) {
        alert('User ID is required. Redirecting to expenses page for user 1.');
        window.location.href = '/expenses?userId=1';
    }
    
    let userId = urlParams.get('userId');

    // Fetch expenses when the page loads
    fetchExpenses(userId);

    function fetchExpenses(userId) {
        fetch(`/api/expenses/user/${userId}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                populateExpensesTable(data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    // Function to set rows to the expense table
    function populateExpensesTable(expenses) {
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
                    <button class="btn btn-block btn-primary">Update</button>
                    <button class="btn btn-block btn-danger" onClick="deleteExpense(${expense.id})"">Delete</button>
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
                fetchExpenses(userId); 
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
</script>
@endsection