var app = angular.module("MailApp", []);

/**
 * HTTP-Request, um eine Mail zu schicken.
 * Dient für das Kontaktformular
 *
 * @author ALI Abusufean
 */
app.controller("MailController", function ($scope, $http) {
    $scope.sent = false;

    $scope.sendMail = function () {
        $scope.sent = true;

        $http({
            method: 'GET',
            url: 'mailer/mailer.php',
            params: {
                name: $scope.name,
                email: $scope.email,
                message: $scope.message
            }
        }).then(function successCallback (response) {
            //alert(JSON.stringify(response.data));
            //if(response.data.mail_sent === "true")
            //$scope.sent = true;

        }, function errorCallback (error) {
            //alert(JSON.stringify(error));
        });
    };
});