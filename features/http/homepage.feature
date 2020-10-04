@homepage @views
Feature: Test if homepage is rendered correctly

  Scenario: User is requesting homepage
    Given a user is requesting "/"
    When a request is sent
    Then a response status code should be "200"

  Scenario: User is requesting Nova dashboard
    Given a user is requesting "/dashboard"
    When a request is sent
    Then a response status code should be "302"

  Scenario: User is requesting non-existing page
    Given a user is requesting "/test"
    When a request is sent
    Then a response status code should be "404"
