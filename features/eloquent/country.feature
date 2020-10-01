@eloquent
Feature: Test if countries are working correctly

  Scenario: When country is created, UUID and slug should be always assigned
    When there are countries created:
      | name           | code |
      | Czechoslovakia | cs   |
      | Soviet Union   | su   |
    Then they should have UUID-formatted id
    And they should have slugs:
      | slug           |
      | czechoslovakia |
      | soviet-union   |
