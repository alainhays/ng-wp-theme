class SignInService {
  constructor($http) {
    'ngInject';
    this.$http = $http;
  };

  loginUser(username, password) {
    return this.$http.get(globals.ajaxurl, {
      params: {
        action: 'loginFn',
        username: username,
        password: password
      }
    }).then( (response) => {
        return response.data;
      })
      .catch( (error) => {
        console.error(error);
      });
  };
};

export default SignInService;