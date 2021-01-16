Feature: Api HealthCheck endpoint
  Scenario:
    In order to know if the application is up and running
    I want to check the status of the Api HealthCheck

    When I send a "GET" request to "/health_check"
    Then the response status code should be 200
    Then the response body should contain:
    """
    {
      "success": true
    }
    """
