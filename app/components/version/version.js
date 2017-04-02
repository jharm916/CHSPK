'use strict';

angular.module('chspk.version', [
  'chspk.version.interpolate-filter',
  'chspk.version.version-directive'
])

.value('version', '0.1');
