describe('Admin functionality', () => {

    beforeEach(() => {
        cy.refreshDatabase();
        cy.seed('DatabaseSeeder');
    });

    it('checks if admin can login', () => {
        cy.visit('/');
        cy.get('[data-dmmapp="login"]').click()
        cy.url().should('include', '/login')
        cy.get('[data-dmmapp="login-form"]').within(() => {
            cy.get('[data-dmmapp="email"]').type(Cypress.env('username'), {force: true})
            cy.get('[data-dmmapp="password"]').type(Cypress.env('password'), {force: true})
        })
        cy.get('[data-dmmapp="login-button"]').click({force: true})
        cy.url().should('include', '/admin/home')
    })

    it('checks if admin can create an institution', () => {
        cy.login({email: Cypress.env('username')});
        cy.visit('/admin/new');
        cy.get('[data-dmmapp=library]').type('Test', {force: true})
        cy.get('[data-dmmapp=quantity]').select('Many (Between 50 and 100 digitized manuscripts)', {force: true})
        cy.get('[data-dmmapp=website]').type('https://test.com', {force: true})
        cy.get('[data-dmmapp=slug]').type('test', {force: true})
        cy.get('[data-dmmapp=iiif]').check('1', {force: true})
        cy.get('[data-dmmapp=is-part-of]').check('1', {force: true})
        cy.get('[data-dmmapp=is-part-of-name]').type('test', {force: true})
        cy.get('[data-dmmapp=is-part-of-url]').type('https://example.com', {force: true})
        cy.get('[data-dmmapp=nation]').type('Test', {force: true})
        cy.get('[data-dmmapp=city]').type('Test', {force: true})
        cy.get('[data-dmmapp=lat]').type('12.123', {force: true})
        cy.get('[data-dmmapp=lng]').type('123.123', {force: true})
        cy.get('[data-dmmapp=copyright]').type('CC-0', {force: true})
        cy.get('[data-dmmapp=is-free-cultural-license]').check('1', {force: true})
        cy.get('[data-dmmapp=notes]').type('These are random notes', {force: true})
        cy.get('[data-dmmapp=has-post]').check('1', {force: true})
        cy.get('[data-dmmapp=post-url]').type('https://test.com', {force: true})
        cy.get('[data-dmmapp=submit]').click({force: true})
        cy.url().should('include', '/admin/home')
        cy.contains('A new institution has been successfully saved.')
        cy.get('.row > .col-sm-12 > #dashboard_filter > label > .form-control').type('test', {force: true})
        cy.get('.col-sm-12 > #dashboard > tbody').contains('Test')
    })


    it('checks if admin can view an institution', () => {
        cy.login({email: Cypress.env('username')});
        cy.visit('/data');
        cy.get('[data-dmmapp=explore]').first().click({force: true})
        cy.get('[data-dmmapp=library-info]').should('be.visible')
        cy.get('[data-dmmapp=institution-card]').should('exist')
        cy.get('[data-dmmapp=library]').should('not.be.empty')
        cy.get('[data-dmmapp=url]').should('not.be.empty')

    })

    it('checks if admin can update an institution', function () {
        cy.login({email: Cypress.env('username')});
        cy.visit('admin/edit/1')
        cy.get('[data-dmmapp=library]').clear({force: true}).type('Update test', {force: true})
        cy.get('[data-dmmapp=quantity]').select('Hundreds (between 100 and 500 digitized manuscripts)', {force: true})
        cy.get('[data-dmmapp=website]').clear({force: true}).type('https://update.com', {force: true})
        cy.get('[data-dmmapp=slug]').clear({force: true}).type('update-test', {force: true})
        cy.get('[data-dmmapp=is-part-of]').check('1', {force: true})
        cy.get('[data-dmmapp=iiif]').check('1', {force: true})
        cy.get('[data-dmmapp=nation]').clear({force: true}).type('Test', {force: true})
        cy.get('[data-dmmapp=city]').clear({force: true}).type('Test', {force: true})
        cy.get('[data-dmmapp=lat]').clear({force: true}).type('-12.2323', {force: true})
        cy.get('[data-dmmapp=lng]').clear({force: true}).type('192.2323', {force: true})
        cy.get('[data-dmmapp=copyright]').clear({force: true}).type('CC-0', {force: true})
        cy.get('[data-dmmapp=free-cultural-license]').check('1', {force: true})
        cy.get('[data-dmmapp=notes]').clear({force: true}).type('These are edited notes', {force: true})
        cy.get('[data-dmmapp=has-post]').check('1', {force: true})
        cy.get('[data-dmmapp=post-url]').clear({force: true}).type('https://testing.com', {force: true})
        cy.get('[data-dmmapp=submit]').click({force: true})
        cy.url().should('include', '/admin/home')
        cy.contains('An institution has been successfully updated.')
        cy.get('#dashboard > tbody > .odd:nth-child(1) > td > .btn').click({force: true})
        cy.get('[data-dmmapp=library]').clear({force: true}).type('Update again', {force: true})
        cy.get('[data-dmmapp=quantity]').select('Unknown', {force: true})
        cy.get('[data-dmmapp=website]').clear({force: true}).type('https://testing.com', {force: true})
        cy.get('[data-dmmapp=slug]').clear({force: true}).type('second-update-test', {force: true})
        cy.get('[data-dmmapp=is-part-of]').uncheck({force: true})
        cy.get('[data-dmmapp=iiif]').uncheck({force: true})
        cy.get('[data-dmmapp=nation]').clear({force: true}).type('Test', {force: true})
        cy.get('[data-dmmapp=city]').clear({force: true}).type('Test', {force: true})
        cy.get('[data-dmmapp=lat]').clear({force: true}).type('-12.2323', {force: true})
        cy.get('[data-dmmapp=lng]').clear({force: true}).type('192.2323', {force: true})
        cy.get('[data-dmmapp=copyright]').clear({force: true}).type('CC-1', {force: true})
        cy.get('[data-dmmapp=free-cultural-license]').uncheck({force: true})
        cy.get('[data-dmmapp=notes]').clear({force: true}).type('These are re-edited notes', {force: true})
        cy.get('[data-dmmapp=post-url]').clear({force: true})
        cy.get('[data-dmmapp=has-post]').uncheck({force: true})
        cy.get('[data-dmmapp=submit]').click({force: true})
        cy.url().should('include', '/admin/home')
        cy.contains('An institution has been successfully updated.')
    })

    it('checks if admin can delete an institution', function () {
        cy.login({email: Cypress.env('username')});
        cy.visit('admin/edit/1')
        cy.get('[data-dmmapp=delete]').click({force: true})
        cy.on('window:confirm', () => true);
        cy.url().should('include', '/admin/home')
        cy.contains('An institution has been successfully deleted.')
    })
})
