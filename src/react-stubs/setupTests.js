
/**
 * Enzyme is a JavaScript testing utility library that makes it easy to render,
 * manipulate, and assert upon your React Components' output in your tests.
 * The adapter for our installed version of React is configured below.
 */

const enzyme = require('enzyme');
const Adapter = require('enzyme-adapter-react-16');

enzyme.configure({ adapter: new Adapter() });
