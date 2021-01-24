Feature: Create Note Endpoint
  Scenario: It creates a new note
    When I send a "POST" request to "/api/v1/notes" with body:
    """
    {
      "title": "This is a note",
      "content": "Let's play with my demo project!"
    }
    """
    Then the response status code should be 200