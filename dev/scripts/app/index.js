import App from './app';

if ( angular.element('#application').length ) {
  angular.bootstrap('#application', [App]);
}
