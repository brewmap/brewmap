@facebook @auth
Feature: Test an ability to register and login via Facebook profile

  Scenario: User is attempting to authorize using Facebook
    Given a user is requesting "/facebook" using "GET"
    When a request is sent
    Then a response status code should be "302"
    And a response should be of type "Illuminate\Http\RedirectResponse"
    Then a response should be a redirect containing "https://www.facebook.com/v3.3/dialog/oauth"
