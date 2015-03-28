angular.module('app.public.home', [])

    .config(function($stateProvider) {
        $stateProvider.state('app.public.home', {
            url: '/',
            views: {
                "main@app.public": { // Points to the ui-view="main" in modal-layout.tpl.html
                    controller: 'app.public.home.controller',
                    templateUrl: 'app/public/home/home.tpl.html'
                }
            },
            data: {
                title: "Home",
                role: 'public'
            }
        });
    })

    .controller('app.public.home.controller', function($rootScope, $scope, $location, statePermissionService) {


    })

;