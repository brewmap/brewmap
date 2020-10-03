@telescope @views
Feature: Test if telescope works

  Scenario: User is requesting telescope dashboard when environment is local and telescope is enabled
    Given application is booted with config:
      | config            | value |
      | app.env           | local |
      | telescope.enabled | true  |
    And a user is requesting "/telescope"
    When a request is sent
    Then a response status code should be "200"

  Scenario: User is requesting telescope dashboard when environment is local but telescope is disabled
    Given application is booted with config:
      | config            | value |
      | app.env           | local |
      | telescope.enabled | false |
    And a user is requesting "/telescope"
    When a request is sent
    Then a response status code should be "404"

  Scenario: User is requesting telescope dashboard when environment is production
    Given application is booted with config:
      | config            | value      |
      | app.env           | production |
      | telescope.enabled | true       |
    And a user is requesting "/telescope"
    When a request is sent
    Then a response status code should be "403"
