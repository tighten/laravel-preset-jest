import { shallowMount } from '@vue/test-utils'
import ExampleComponent from '@/ExampleComponent.vue'

describe('ExampleComponent', () => {
    it('renders the component', () => {
        const wrapper = shallowMount(ExampleComponent)

        expect(wrapper.text()).toContain("I'm an example component.")
        expect(wrapper).toMatchSnapshot()
    })
})
