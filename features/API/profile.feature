@API @Profile
Feature: Test an ability to update profile data

  Background:
    Given there are users created:
      | id                                   | email             | is_admin |
      | 00000000-0000-0000-0000-000000000000 | user@example.com  | 0        |
 
  Scenario: User is attempting to edit profile data
    Given user is logged in as "user@example.com"
    And a user is requesting "api/profile" using "DELETE"
    When a request is sent
    Then a response status code should be "405"
    
  Scenario: User is attempting to update profile data
    Given user is logged in as "user@example.com"
    And a user is requesting "api/profile" using "PATCH"
    And request body contains "public_name" equal "John Doe"
    And request body contains "birthday" equal "2000-01-01"
    When a request is sent
    Then a response status code should be "200"
    And response body should contain:
      | message         | Successfully updated profile data   |
      
  Scenario: User is attempting to edit profile data
    Given user is logged in as "user@example.com"
    And a user is requesting "api/profile" using "GET"
    When a request is sent
    Then a response status code should be "200"
    And response body should contain:
      | data         | {"public_name":"John Doe","avatar_path":"","birthday":"2000-01-01"}   |
