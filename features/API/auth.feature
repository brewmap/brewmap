@API @Auth
Feature: Test and ability to register and login

  Scenario: User is attempting to register using valid data
    Given an user is requesting "/api/register" using "POST"
    And request body contains "email" equal "testuser@example.com"
    And request body contains "password" equal "password"
    And request body contains "password_confirmation" equal "password"
    And request body contains "name" equal "username"
    When a request is sent
    Then a response status code should be "200"

  Scenario: User is attempting to register using existing email
    Given an user is requesting "/api/register" using "POST"
    And request body contains "email" equal "testuser@example.com"
    And request body contains "password" equal "password"
    And request body contains "password_confirmation" equal "password"
    And request body contains "name" equal "username"
    When a request is sent
    Then a response status code should be "422"

  Scenario: User is attempting to register using malformed syntax
    Given an user is requesting "/api/register" using "POST"
    And request body contains "email" equal "testuser@"
    And request body contains "password" equal "password"
    And request body contains "password_confirmation" equal "password"
    And request body contains "name" equal "username"
    When a request is sent
    Then a response status code should be "422"

  Scenario: User is attempting to log in with proper credentials
    Given an user is requesting "/api/login" using "POST"
    And request body contains "email" equal "testuser@example.com"
    And request body contains "password" equal "password"
    When a request is sent
    Then a response status code should be "200"

  Scenario: User is attempting to log in without credentials
    Given an user is requesting "/api/login" using "POST"
    When a request is sent
    Then a response status code should be "422"

  Scenario: User is attempting to log in with valid, but mismatching credentials
    Given an user is requesting "/api/login" using "POST"
    And request body contains "email" equal "testuser@example.com"
    And request body contains "password" equal "passworD"
    When a request is sent
    Then a response status code should be "401"
