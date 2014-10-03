<!DOCTYPE html>
<html>
<head>
    <style>
        input:focus {
            background-color: yellow;
            font-style: italic;
        }
    </style>
</head>
<body>

<p>Click inside the text fields to see a yellow background:</p>


    <form>
            First name <input type="text" name="fName" id="idFName"/>
            <p/>
            Last Name <input type="text" name="fName" id="idLName"/>
            <p/>
            Address 1 <input type="text" name="add1" id="idAdd1"/>
            <p/>
            Address 2 <input type="text" name="add2" id="idAdd2"/>
            <p/>
            Email <input type="text" name="email" id="idEmail"/>

    </form>


<p><b>Note:</b> For :focus to work in IE8, a DOCTYPE must be declared.</p>

</body>
</html>