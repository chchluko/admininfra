<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Constacncia</title>
    <style type="text/css" media="screen">

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
                        }

        a {
          color: #5D6975;
          text-decoration: underline;
          }

        body {
          position: relative;
          width: 18cm;
          height: 29.7cm;
          margin: 0 auto;
          color: #001028;
          background: #FFFFFF;
          font-family: Arial, sans-serif;
          font-size: 14px;
          font-family: Arial;
             }

        header {
          padding: 10px 0;
          margin-bottom: 30px;
        }

        #logo {
          text-align: center;
          margin-bottom: 10px;
        }

        #logo img {
          width: 90px;
        }

        h1 {
          border-top: 1px solid  #5D6975;
          border-bottom: 1px solid  #5D6975;
          color: #5D6975;
          font-size: 2.4em;
          line-height: 1.4em;
          font-weight: normal;
          text-align: center;
          margin: 0 0 20px 0;
          background: url(dimension.png);
        }

        #project {
          float: left;
        }

        #project span {
          color: #5D6975;
          text-align: right;
          width: 52px;
          margin-right: 10px;
          display: inline-block;
          font-size: 0.8em;
        }

        #company {
          float: right;
          text-align: right;
        }

        #project div,
        #company div {
          white-space: nowrap;
        }
        table {
            border-collapse: collapse;
        }
       /* table, th, td {
           border: 1px solid black;
        }*/
        table.clean{
            border: 0px;
        }
        div.centerTable{
                text-align: center;
        }
        div.centerTable table {
               margin: 0 auto;
               text-align: left;
        }
        #notices .notice {
          color: #5D6975;
          font-size: 1.2em;
        }

        footer {
          color: #5D6975;
          width: 100%;
          height: 30px;
          position: absolute;
          bottom: 0;
          border-top: 1px solid #C1CED9;
          padding: 8px 0;
          text-align: center;
        }
        .fijo {
            position:fixed !important;
            left: 620px;
            bottom: 800px;
            z-index:-10 !important}


          @page {
          margin-bottom: 2cm;
        }

        #header,
        #footer {
          position: fixed;
          left: 0;
          right: 0;
          color: #aaa;
          font-size: 0.9em;
        }

        #footer {
          bottom: 0;
          border-top: 0.1pt solid #aaa;
        }

        #header table,
        #footer table {
          width: 100%;
          border-collapse: collapse;
          border: none;
        }

        #header td,
        #footer td {
          padding: 0;
          width: 50%;
        }

        .page-number {
          text-align: right;
        }

        .page-number:before {
          content: "Ref. ";
        }

        hr {
          page-break-after: always;
          border: 0;
        }
        </style>
</head>
<body style="text-align: justify;">
    <div class="logon"><img src="images/proa.jpg" width="120px"></div>
@yield('documento')
</body>
</html>
