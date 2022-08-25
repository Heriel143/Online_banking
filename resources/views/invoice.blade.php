<!DOCTYPE html>
<html>
<head>
<style>
  *{
    font-family:verdana;
  }
#customers {
  font-family:sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

  <h2 style="text-align: center;">Account Name: {{ $display[0]['account_name'] }}</h2>


<h3>A Bank Statement</h3>

<table id="customers">
  <tr>
    <th>S/N</th>
    <th>From</th>
    <th>To</th>
    <th>Amount</th>
    <th>Date</th>
  </tr>
  @php($i = 1)
  @foreach($transaction as $account)
  <tr>
    <td>{{ $i++ }}</td>
    <td>{{ $account->sender_acc_no }}</td>
    <td>{{ $account->receiver_acc_no }}</td>
    <td>{{ $account->amount }}</td>
    <td>{{ $account->created_at }}</td>
  </tr>
  @endforeach
  
</table>
<p style="float: right;">Current Balance: TZS <span class="dollars">{{ $display[0]['balance'] }}</span></p>

</body>

<!-- Mirrored from www.w3schools.com/css/tryit.asp?filename=trycss_table_fancy by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Feb 2022 14:54:10 GMT -->
</html>


