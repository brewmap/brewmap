@API @Auth
Feature: Test an ability to login

  Scenario: User is attempting to log in with proper credentials
    Given an user is requesting "/api/login" using "POST"
    And request body contains "email" equal "test1@example.com"
    And request body contains "password" equal "password"
    When a request is sent
    Then a response status code should be "200"

  Scenario: User is attempting to log in without credentials
    Given an user is requesting "/api/login" using "POST"
    When a request is sent
    Then a response status code should be "422"

  Scenario: User is attempting to log in with valid, but mismatching credentials
    Given an user is requesting "/api/login" using "POST"
    And request body contains "email" equal "test1@example.com"
    And request body contains "password" equal "passworD"
    When a request is sent
    Then a response status code should be "401"
