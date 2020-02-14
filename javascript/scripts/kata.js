/**
 *
 * Inviqa Kata init script
 *
 * Cretes a barebone kata to quickly start testing and coding
 * @version 0.1
 * @author Anil Maharjan <anil.maharjan@inviqa.com>
 *
 * To execute this file run
 *
 * npm run kata:new <kataName>
 *
 * Uses /templates and fill the classnames / variables with provided <kataName>
 *
 * New Kata will be created under src/<kataName>/ directory
 *
 */

const name = process.argv[2] || 'newKata';

var _handlebars = require('Handlebars'),
  _fs = require('fs-extra');
const { spawn } = require('child_process');

/**
 * Capitalize first letter of a string
 *
 * Utility function
 * @param {string} s
 */
const capitalize = s => {
  if (typeof s !== 'string') return '';
  return s.charAt(0).toUpperCase() + s.slice(1);
};

let data = {
  name,
  capitalName: capitalize(name),
};

/**
 * writeFileCompiled
 *
 * Compiles a file using handlebars
 * @param {string} name
 * @param {object} data
 * @param {string} tplFileName
 */
const writeFileCompiled = (name, data, tplFileName) => {
  var fileContent = _fs
    .readFileSync(`scripts/templates/${tplFileName}.template`)
    .toString();

  var template = _handlebars.compile(fileContent);
  const filePath = `./src/${name}/${tplFileName}`;

  _fs.ensureFileSync(filePath);
  _fs.writeFileSync(filePath, template(data), { flag: 'w' });
};

// Write filesw
writeFileCompiled(name, data, 'index.ts');
writeFileCompiled(name, data, 'index.test.ts');

// Start test runner (Jest)
spawn(`npm`, ['run', 'test-watch', name], {
  cwd: process.cwd(),
  detached: true,
  stdio: 'inherit',
});
