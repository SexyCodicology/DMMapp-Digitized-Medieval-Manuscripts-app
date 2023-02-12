describe('template spec', () => {
  it('passes', () => {
      cy.visit('/');

      cy.contains('DMMapp');
      cy.contains('Giulio Menna');
      cy.contains('Support us on Patreon');
      cy.contains('Master Scribes');

  })
})
