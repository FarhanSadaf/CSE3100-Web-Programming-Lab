<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank Account</title>
</head>
<body>

    <h1>Bank Account Form</h1>
    <form action="{{ route('bank-account') }}" method="POST">
        @csrf
        Amount: 
        <input type="number" name="amount" id="amount">
        <button type="submit" name="action" value="deposit">Deposit</button>
        <button type="submit" name="action" value="withdraw">Withdraw</button>
    </form>
    Current balance: ${{ $balance }}
    
</body>
</html>