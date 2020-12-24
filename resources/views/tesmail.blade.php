<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Transactions Report</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:250px;">
                            </td>
                            <td>
                                PT. Lintas Buana Travel<br>
                                Jl. Jend. Basuki Rachmat<br>
                                 No. 01 Nganjuk
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                Nama Pemesan : Yustria Akbar<br>
                                Tanggal Beli : 20-12-2020<br>
                                Tanggal Berangkat : 23-12-2020
                            </td>
                            
                            <td>
                                Kode Order : qwerty<br>
                                Kode Tiket : mnbvcx<br>
                                <b>Nganjuk - Surabaya</b>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Nama Penumpang
                </td>
                <td>
                    Nomor Identitas
                </td>
                <td style="text-align: center;">
                    Kursi
                </td>
                <td>
                    Harga Tiket
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Yustria Akbar
                </td>
                <td>
                    351811201234
                </td>
                <td style="text-align: center;">
                    3
                </td>
                <td>
                    Rp. 100.000
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Maharani
                </td>
                <td>
                    351811201234
                </td>
                <td style="text-align: center;">
                    4
                </td>
                <td>
                    Rp. 100.000
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Dian 
                </td>
                <td>
                    351811201234
                </td>
                <td style="text-align: center;">
                    5
                </td>
                <td>
                    Rp. 100.000
                </td>
            </tr>
            
            <tr class="item last">
                <td></td>
                <td></td>
                <td style="text-align: center;">Total :</td>
                <td>
                   Rp. 300.000
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Detail Pembayaran
                </td>
                <td></td>
                <td></td>
                <td>
                </td>
            </tr>
            <tr class="details">
                <td>
                    BNI a.n Yustria Akbar
                </td>
                <td></td>
                <td></td>
                <td>
                    Rp. 300.000
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
            </tr>
        </table>
    </div>
</body>
</html>