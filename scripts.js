var app = angular.module('myApp', []);
/*
    Fetch User's Data from Databse and Display using angularJS methods
 */
app.controller('customersCtrl', function ($scope, $http)
{
    $http.get("users.php")
        .then(function (response)
        {
            $scope.names = response.data;
        });
});

$(document).ready(function ()
{
    //Loading Selected User's Data into the 'Edit Form' For Editing and Updating purposes
    $("td a").on("click", function ()
    {
        $("#user_edit_form").hide();
        var row = $(this).closest('tr');
        var columns = row.find('td');

        var values = new Array();
        $.each(columns, function (i, item)
        {
            if (i === 0)
                values.push($(this).text());
            else
                values.push(item.innerHTML);
            console.log(item.innerHTML + " ");

        });

        $("#srno").val(values[0]);
        $("#uname").val(values[1]);
        $("#uemail").val(values[2]);
        $("#upass").val(values[3]);

        $("#user_edit_form").fadeIn("slow");
    });


    //On Update Button click, Send Update Request to REST with respective values
    $("#update").on("click", function ()
    {
        let uname = $("#uname").val();
        let uemail = $("#uemail").val();
        let upass = $("#upass").val();
        let srno = $("#srno").val();

        $.post("users.php",
            {
                name: uname,
                email: uemail,
                pass: upass,
                srno: srno,
                update: "True"
            },
            function (data, status)
            {
                console.log("Data: " + data + "\nStatus: " + status);
                window.location.reload();
            }
        )
    });

    //On Button Click, Check if it's identity is to Delete and then perform delete operation
    $("button").on("click", function ()
    {
        if ($(this).attr("name") === "delete")
        {
            $.get("users.php?id=" + $(this).attr("id") + "&del=true",
                function (data, status)
                {
                    console.log("Data: " + data + "\nStatus: " + status);
                    window.location.reload();
                }
            );
        }
    });

    //Adding new Record to the Database.. No Error handling is being done yet.
    $("#newrecord").on("click", function ()
    {
        if (confirm("Do you want to Insert Data?"))
        {
            $.post("users.php",
                {
                    Name: $("#newname").val(),
                    Email: $("#newmail").val(),
                    Pass: $("#newpass").val(),
                    New: "True"
                },
                function (data, status)
                {
                    console.log("Data: " + data + "\nStatus: " + status);
                    window.location.reload();
                }
            );

        }
    });

});