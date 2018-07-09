import React from 'react';
import { shallow } from 'enzyme';
import Example from './Example';

describe('Example', () => {
    it('renders the component', () => {
        const wrapper = shallow(<Example />);

        expect(wrapper.text()).toContain("I'm an example component.");
        expect(wrapper).toMatchSnapshot();
    });
});
