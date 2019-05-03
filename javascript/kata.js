function parse(argument) {
  let returnObj = {};

  argument.split(' ').forEach(d => {
    if (d.indexOf('--') > -1) {
      if (d.indexOf('=') > -1) {
        let keyVal = d.split('=');
        returnObj[keyVal[0].replace('--', '')] = keyVal[1];
        return;
      }
      returnObj[d.replace('--', '')] = true;
      return;
    } else if (d.indexOf('-') > -1) {
      d.replace('-', '').split('').forEach(x => returnObj[x] = true);
      return;
    }
    throw new Error('Invalid Input');
  });
  return returnObj
}

module.exports.kata = parse;
