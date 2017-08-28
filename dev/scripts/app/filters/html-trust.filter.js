function SafeHtml($sce) {
  return (val) => {
    return $sce.trustAsHtml(val);
  };
};

export default SafeHtml;