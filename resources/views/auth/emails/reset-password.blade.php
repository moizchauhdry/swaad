<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f45318;
            color: white;
        }
    </style>
</head>

<body>
    <table id="customers">
        <tr>
            <th style="text-align: center">Swaad Reset Password</th>
        </tr>
        <tr>
            <td style="text-align: center">
                You are receiving this email because we recieved a password reset request for your account.
            </td>
        </tr>
        <tr>
            <td style="text-align: center">
                <a href="{{route('userPasswordReset',$token)}}">Reset Password</a>
            </td>
        </tr>
    </table>
</body>

</html>