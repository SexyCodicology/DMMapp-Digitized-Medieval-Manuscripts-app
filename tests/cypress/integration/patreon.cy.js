describe('check Patreon links across app', () => {
    beforeEach(() => {
        cy.visit('/')
    })

    it('checks Patreon links in layouts.app', () => {
        cy.get('[data-dmmapp="patreon-top-icon"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150');
        cy.get('[data-dmmapp="patreon-footer-icon"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150');
        cy.get('[data-dmmapp="patreon-footer-icon"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150');

    })
    it('checks working links in Patreon component', () => {
        cy.get('[data-dmmapp="patreon-cta"]').should("have.attr", 'href', 'https://www.patreon.com/SexyCodicology')
        cy.get('[data-dmmapp="patreon-sexy-codicologists"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150')
        cy.get('[data-dmmapp="patreon-scribes"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150')
        cy.get('[data-dmmapp="patreon-master-scribes"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150')
        cy.get('[data-dmmapp="patreon-pope"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150')

    })
})
