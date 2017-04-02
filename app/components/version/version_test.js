'use strict';

describe('chspk.version module', function() {
  beforeEach(module('chspk.version'));

  describe('version service', function() {
    it('should return current version', inject(function(version) {
      expect(version).toEqual('0.1');
    }));
  });
});
