@localization
Feature: Test if localization is working correctly

  Scenario: User is requesting application status
    Given an user is requesting "/api/"
    When a request is sent
    Then a response status code should be "200"
    And response body should contain:
      | key         | value   |
      | environment | testing |
      | locale      | en      |

  Scenario: User is requesting application status with not default locale
    Given an user is requesting "/api/"
    And custom request headers are defined:
      | header          | value |
      | Accept-Language | pl    |
    When a request is sent
    Then a response status code should be "200"
    And response body should contain:
      | key         | value   |
      | environment | testing |
      | locale      | pl      |

  Scenario: User is requesting application status with not supported locale
    Given an user is requesting "/api/"
    And custom request headers are defined:
      | header          | value |
      | Accept-Language | kl    |
    When a request is sent
    Then a response status code should be "200"
    And response body should contain:
      | key         | value   |
      | environment | testing |
      | locale      | en      |
