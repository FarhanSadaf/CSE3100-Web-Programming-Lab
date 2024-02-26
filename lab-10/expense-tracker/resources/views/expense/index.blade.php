@extends('layouts.master')
@section('content')
    @include('components.expense-list')
@endsection

<script>
    let userId = 1; // Hardcoded user ID for now

    // Fetch API call to get expenses data
    fetch(`/api/expenses/user/${userId}`)
        .then(response => response.json())
        .then(expenses => {
            const expenseTableBody = document.getElementById('expense-table-body');
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
                        <button class="btn btn-danger">Delete</button>
                    </td>
                `;
                expenseTableBody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
</script>