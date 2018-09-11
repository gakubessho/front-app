function test(string, number) {
    var ret = '';
    ret = string + 'test';
  
    var num = '';
    num = number * 12;
  
    ret += ret + ' : ' + num;
  
    return ret;
  }