Feature: Api Index endpoint
  Scenario: It receives a response from Index route
    When I send a "GET" request to "/"
    Then the response status code should be 200
    Then the response content should be:
    """
    {}
    """
  Scenario: It receives a 404 Error
    When I send a "GET" request to "/route_does_not_exist"
    Then the response status code should be 404
    Then the response body should contain:
    """
    {
      "code": 404
    }
    """

  Scenario: It receives a 405 Method Not Allowed Error
    When I send a "POST" request to "/"
    Then the response status code should be 405
    Then the response body should contain:
    """
    {
      "code": 405
    }
    """
