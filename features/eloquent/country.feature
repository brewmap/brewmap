@eloquent
Feature: Test if countries are working correctly

  Scenario: When country is created, UUID and slug should be always assigned
    Given there are countries created:
      | name           | code |
      | Czechoslovakia | cs   |
      | Soviet Union   | su   |
      | Réunion        | re   |
    Then they should have UUID-formatted id
    And they should have slugs:
      | slug           |
      | czechoslovakia |
      | soviet-union   |
      | reunion        |

  Scenario: Seeder with real world countries should seed expected number of countries
    Given "\Database\Seeders\RealWorldCountriesSeeder" seeder was ran
    Then there should be 250 countries in database
