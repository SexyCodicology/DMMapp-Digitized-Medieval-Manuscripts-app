describe('check Patreon links across app', () => {
    it('passes if all links to Patreon work', () => {
        cy.visit('/');
        cy.get('#header > .container > .header-social-links > .patreon').should('have.attr', 'href', 'https://www.patreon.com/bePatron?u=3645539');
        cy.get('.footer-top > .container > .row > .col-lg-4 > a').should("have.attr", 'href', 'https://www.patreon.com/bePatron?u=3645539');
        cy.get('.col-lg-3 > .footer-info > .social-links > .patreon').should("have.attr", 'href', 'https://www.patreon.com/bePatron?u=3645539');

    })
    it('passes if individual links to individual subscriptions to Patreon work', () => {
        cy.visit('/');
        cy.get('[data-cy="patreon-cta"]').should("have.attr", 'href', 'https://www.patreon.com/SexyCodicology')
        cy.get('[data-cy="patreon-sexy-codicologists"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150')
        cy.get('[data-cy="patreon-scribes"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150')
        cy.get('[data-cy="patreon-master-scribes"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150')
        cy.get('[data-cy="patreon-pope"]').should("have.attr", 'href', 'https://www.patreon.com/join/424150')


    })
})
