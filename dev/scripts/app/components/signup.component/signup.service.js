class SignUpService {
  constructor($q) {
    this.$q = $q;
  }
  signUp(name, password, email) {

  }
}

SignUpService.$inject = ['$q'];

export default SignUpService;